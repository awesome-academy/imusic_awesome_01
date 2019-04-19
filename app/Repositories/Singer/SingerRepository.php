<?php

namespace App\Repositories\Singer;

use App\Models\Singer;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\DatabaseManager;
use App\Repositories\Singer\SingerRepositoryInterface;

/**
 * Class BaseRepository
 *
 * @package Framgia\Gmt\Repositories
 */
class SingerRepository extends BaseRepository implements SingerRepositoryInterface
{
    /**
     * @var Singer
     */
    protected $model;

    /**
     * @var DatabaseManager
     */
    private $db;

    /**
     * SingerRepository constructor.
     *
     * @param Singer $model
     * @param DatabaseManager $db
     */
    public function __construct(Singer $model, DatabaseManager $db)
    {
        parent::__construct($model);

        $this->db = $db;
    }
}
