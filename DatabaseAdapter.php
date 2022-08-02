<?php

namespace NeoanIo\MarketPlace;

use Exception;
use Neoan\Database\Adaptor;
use Neoan3\Apps\DbException;
use Neoan3\Apps\DbOOP;

class DatabaseAdapter extends DbOOP implements \Neoan\Database\Adapter
{

    /**
     * @throws Exception
     */
    public function raw(string $sql, array $conditions, mixed $extra)
    {
        try{
            return $this->smart('>' . $sql, $conditions, $extra);
        } catch (DbException $e){
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function insert($table, array $content)
    {
        try{
            $this->sanitizePassword($content);
            return $this->smart($table, $content);
        } catch (DbException $e){
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function update($table, array $values, array $where)
    {
        try{
            $this->sanitizePassword($values);
            return $this->smart($table, $values, $where);
        } catch (DbException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function delete($table, string $id, bool $hard = false)
    {
        try{
            return $this->delete($table, $id, $hard);
        } catch (DbException $e){
            throw new Exception($e->getMessage());
        }
    }
    private function sanitizePassword(array &$conditions): void
    {
        if(isset($conditions['password']) && str_starts_with($conditions['password'],'$')){
            $conditions['password'] = '=' . $conditions['password'];
        }
    }
}