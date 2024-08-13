<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GenerateSwaggerSchemas extends Command
{
    protected $signature = 'swagger:schemas';
    protected $description = 'Generate Swagger schema files in the app/Docs/Schema directory';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $schemasPath = base_path('app/Docs/Schema');
        $models = [
            'Product',
            'Supplier',
            'Warehouse',
            'Inventory',
            'InventoryLocation',
            'Purchase',
            'PurchaseItem',
            'User',
        ];

        foreach ($models as $model) {
            $filePath = $schemasPath . '/' . $model . 'Schema.php';
            if (!File::exists($filePath)) {
                $this->createSchemaFile($filePath, $model);
                $this->createRequestSchemaFile($schemasPath . '/Store'.$model.'RequestSchema.php', 'Store'.$model.'Request');
            }
        }

        $this->info('Swagger schema files have been generated.');
    }

    private function createSchemaFile($filePath, $model)
    {
        $modelClass = "App\\Models\\$model";
        if (!class_exists($modelClass)) {
            $this->error("Model class $modelClass does not exist.");
            return;
        }

        /** @var Model $instance */
        $instance = new $modelClass;
        $fillable = $instance->getFillable();
        $properties = [];

        foreach ($fillable as $attribute) {
            $type = $this->getAttributeType($attribute);
            $comment = $this->getAttributeComment($attribute, $modelClass);
            $properties[] = "@OA\Property(property=\"$attribute\", type=\"$type\", description=\"$comment\")";
        }

        $propertiesString = implode(",\n *     ", $properties);

        $content = <<<PHP
<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="{$model}",
 *     type="object",
 *     title="{$model}",
 *     $propertiesString
 * )
 */
class {$model}Schema
{
}
PHP;

        File::put($filePath, $content);
        $this->info("Created schema file for $model at $filePath");
    }

    private function createRequestSchemaFile($filePath, $request)
    {
        $requestClass = "App\\Http\\Requests\\$request";
        if (!class_exists($requestClass)) {
            $this->error("Request class $requestClass does not exist.");
            return;
        }

        $rules = (new $requestClass)->rules();
        $properties = [];

        foreach ($rules as $attribute => $rule) {
            $type = $this->getRequestFieldType($rule);
            $comment = $this->getRequestFieldComment($rule, $attribute);
            $properties[] = "@OA\Property(property=\"$attribute\", type=\"$type\", description=\"$comment\")";
        }

        $propertiesString = implode(",\n *     ", $properties);

        $content = <<<PHP
<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="{$request}",
 *     type="object",
 *     title="{$request}",
 *     $propertiesString
 * )
 */
class {$request}Schema
{
}
PHP;

        File::put($filePath, $content);
        $this->info("Created schema file for $request at $filePath");
    }

    private function getAttributeType($attribute)
    {
        // Determine type based on attribute name or add custom logic
        // This can be expanded based on your application's needs
        return 'string'; // Default type
    }

    private function getAttributeComment($attribute, $modelClass)
    {
        // Handle attributes that reference other models or have special notes
        // Example: If attribute is foreign key or has special notes
        $foreignKeys = [
            'supplier_id' => 'Reference to the Supplier model',
            'user_id' => 'Reference to the User model',
            'product_id'=> 'Reference to the Product model',
        ];

        return $foreignKeys[$attribute] ?? ''; // Return comment if exists
    }

    private function getRequestFieldType($rule)
    {
        // Mapping of rules to OpenAPI types
        if (str_contains($rule, 'integer') || str_contains($rule, 'numeric')) return 'integer';
        if (str_contains($rule, 'string')) return 'string';
        if (str_contains($rule, 'date') || str_contains($rule, 'date_format')) return 'string'; // Use date format in schema
        if (str_contains($rule, 'boolean')) return 'boolean';
        if (str_contains($rule, 'email')) return 'string'; // Email is still a string
        if (str_contains($rule, 'url')) return 'string'; // URL is still a string
        if (str_contains($rule, 'array')) return 'array'; // Handle array types

        return 'string'; // Default fallback
    }

    private function getRequestFieldComment($rule, $attribute)
    {
        // Add comments based on validation rules
        if (str_contains($rule, 'exists')) {
            return "Reference to another model"; // Example comment
        }

        return ''; // Default comment
    }
}
