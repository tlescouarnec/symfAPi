<?php

namespace App\Db\ApplicationSchema;

use PommProject\ModelManager\Model\Model;
use PommProject\ModelManager\Model\Projection;
use PommProject\ModelManager\Model\ModelTrait\WriteQueries;

use PommProject\Foundation\Where;

use App\Db\ApplicationSchema\AutoStructure\Register as RegisterStructure;
use App\Db\ApplicationSchema\Register;

/**
 * RegisterModel
 *
 * Model class for table register.
 *
 * @see Model
 */
class RegisterModel extends Model
{
    use WriteQueries;

    /**
     * __construct()
     *
     * Model constructor
     *
     * @access public
     */
    public function __construct()
    {
        $this->structure = new RegisterStructure;
        $this->flexible_entity_class = '\App\Db\ApplicationSchema\Register';
    }
}
