<?php
namespace App\Contracts;

/**
 * Interface BaseContract
 *
 * @package App\Contracts
 */
interface BaseContract
{
    /**
     * Create a model instance
     *
     * @param  array $attributes
     * @return mixed
     */
    public function create(array $attributes);
    public function count();

    /**
     * Update a model instance
     *
     * @param  array $attributes
     * @param  int   $id
     * @return mixed
     */
    public function update(array $attributes, string $id);

    /**
     * Return all model rows
     *
     * @param  array  $columns
     * @param  string $orderBy
     * @param  string $sortBy
     * @return mixed
     */
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc');

    public function filter($filters, $pagination, array $relationship = [] );


        /**
         * Return all model rows
         *
         * @param  int    $numPaginated
         * @param  string $orderBy
         * @param  string $sortBy
         * @param  array  $relationship
         * @return mixed
         */
    public function allPaginate(int $numPaginated = 9, string $orderBy = 'created_at', string $sortBy = 'desc', array $relationship = []);


    /**
     * @param  array  $columns
     * @param  string $orderBy
     * @param  string $sortBy
     * @return mixed
     */
    public function allForOneUser($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc', string $whereColumn, string $operator, $value);

    /**
     * Return all model rows
     *
     * @param  array $data
     * @param  int   $paginate
     * @param  array $relationship
     * @return mixed
     */
    public function paginate(array $data, int $paginate, array $relationship = []);

    /**
     * Find one by ID
     *
     * @param  int $id
     * @return mixed
     */
    public function find(string $id);

    /**
     * Find one by ID or throw exception
     *
     * @param  int $id
     * @return mixed
     */
    public function findOneOrFail(string $id);

    /**
     * Find based on a different column
     *
     * @param  array $data
     * @return mixed
     */
    public function findBy(array $data);

    public function findByWhere(array $data, array $relationship = []);

    /**
     * Find one based on a different column
     *
     * @param  array $data
     * @param  array $relationship
     * @return mixed
     */
    public function findOneBy(array $data, array $relationship = []);

    /**
     * Find one based on a different column or through exception
     *
     * @param  array $data
     * @return mixed
     */
    public function findOneByOrFail(array $data);

    /**
     * Delete one by Id
     *
     * @param  int $id
     * @return mixed
     */
    public function delete(string $id);
}
