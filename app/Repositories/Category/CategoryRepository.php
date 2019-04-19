<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
use App\Repositories\Category\CategoryRepositoryInterface;

/**
 * Class BaseRepository
 *
 * @package Framgia\Gmt\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    protected $model;

    /**
     * @var DatabaseManager
     */
    private $db;

    /**
     * CategoryRepository constructor.
     *
     * @param Category $model
     * @param DatabaseManager $db
     */
    public function __construct(Category $model, DatabaseManager $db)
    {
        parent::__construct($model);

        $this->db = $db;
    }
}
