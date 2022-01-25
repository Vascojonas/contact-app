<?php

    namespace App\Scopes;
    use Illuminate\Database\Eloquent\Scope;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;



    class SearchScope implements Scope
    {
        protected $searchColumns = [];

        public function apply(Builder $builder, Model $model)
        {
            if($search=request('search'))
            {
                $columns = property_exists($model, 'searchColumns')? $model->searchColumns : $this->searchColumns;  
                foreach ($columns as $index => $column) {
                    $arr = explode('.', $column);
                    $method = $index===0 ? 'where' :'orWhere';
                    
                    if(count($arr)==2){
                        $method.="Has";
                        list($relationship, $column)=$arr;
                        $builder->$method($relationship, function($query) use($search, $column){
                          $query->where($column,'like', "%{$search}%");
                        });
                    }else{
                        $builder->$method($column , 'like', "%{$search}%");
                    }
                   
                }

               
                
                
            }
        }
    }


?>
