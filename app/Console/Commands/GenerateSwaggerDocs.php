<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GenerateSwaggerDocs extends Command
{
    protected $signature = 'swagger:generate';
    protected $description = 'Generate Swagger documentation files in the app/Docs directory';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $docsPath = base_path('app/Docs');
        $controllers = [
            'Product',
            'Supplier',
            'Warehouse',
            'Inventory',
            'InventoryLocation',
            'Purchase',
            'PurchaseItem',
            'User',
        ];

        foreach ($controllers as $controller) {
            $filePath = $docsPath . '/' . $controller . 'Docs.php';
            if (!File::exists($filePath)) {
                $this->createControllerDocFile($filePath, $controller.'Controller');
            }
        }

        $this->info('Swagger documentation files have been generated.');
    }

    private function createControllerDocFile($filePath, $controller)
    {
        $resourceName = $this->getResourceName($controller);
        $resourcePath = $this->getResourcePath($controller);

        $content = <<<PHP
<?php

namespace App\Docs;

use OpenApi\Annotations as OA;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="{$resourceName}",
 *     description="Operations related to {$resourceName}"
 * )
 */

class {$resourceName}Docs
{
    /**
     * @OA\Get(
     *     path="/api/{$resourcePath}",
     *     tags={"{$resourceName}"},
     *     summary="Get list of {$resourceName}",
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         required=false,
     *         description="Search query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         required=false,
     *         description="Number of items per page",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of {$resourceName}",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/{$resourceName}"))
     *     )
     * )
     */
    public function index(Request \$request) {}

    /**
     * @OA\Post(
     *     path="/api/{$resourcePath}",
     *     tags={"{$resourceName}"},
     *     summary="Create a new {$resourceName}",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(ref="#/components/schemas/Store{$resourceName}Request")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="{$resourceName} created",
     *         @OA\JsonContent(ref="#/components/schemas/{$resourceName}")
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/{$resourcePath}/{id}",
     *     tags={"{$resourceName}"},
     *     summary="Get {$resourceName} by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="{$resourceName} ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="{$resourceName} details",
     *         @OA\JsonContent(ref="#/components/schemas/{$resourceName}")
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/{$resourcePath}/{id}",
     *     tags={"{$resourceName}"},
     *     summary="Update {$resourceName} by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="{$resourceName} ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/{$resourceName}")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="{$resourceName} updated",
     *         @OA\JsonContent(ref="#/components/schemas/{$resourceName}")
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/{$resourcePath}/{id}",
     *     tags={"{$resourceName}"},
     *     summary="Delete {$resourceName} by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="{$resourceName} ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="{$resourceName} deleted"
     *     )
     * )
     */
    public function destroy() {}
}

PHP;

        File::put($filePath, $content);
        $this->info("Created documentation file for $controller at $filePath");
    }

    private function getResourceName($controller)
    {
        return Str::singular(Str::replace('Controller', '', $controller));
    }

    private function getResourcePath($controller)
    {
        $name = Str::kebab($this->getResourceName($controller));

        return Str::endsWith($name, 'y') ? Str::replaceLast('y', 'ies', $name) : $name . 's';
    }
}
