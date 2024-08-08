<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class GenerateSwaggerSchemas extends Command
{
    protected $signature = 'swagger:schemas';
    protected $description = 'Generate Swagger schema files in the app/Docs directory';

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
        $properties[] = "@OA\Property(property=\"$attribute\", type=\"string\")";
    }

    $propertiesString = implode(",\n *     ", $properties);

    $content = <<<PHP
<?php

namespace App\Docs\Schema;;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="{$model}",
 *     type="object",
 *     title="{$model}",
 *     required={"id"},
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

}
