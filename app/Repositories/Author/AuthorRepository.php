<?php

namespace App\Repositories\Author;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
use App\Repositories\Author\AuthorRepositoryInterface;

/**
 * Class BaseRepository
 *
 * @package Framgia\Gmt\Repositories
 */
class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    /**
     * @var Author
     */
    protected $model;

    /**
     * @var DatabaseManager
     */
    private $db;

    /**
     * AuthorRepository constructor.
     *
     * @param Author $model
     * @param DatabaseManager $db
     */
    public function __construct(Author $model, DatabaseManager $db)
    {
        parent::__construct($model);

        $this->db = $db;
    }
}
