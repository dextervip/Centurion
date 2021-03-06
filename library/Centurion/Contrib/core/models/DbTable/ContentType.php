<?php
/**
 * Centurion
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@centurion-project.org so we can send you a copy immediately.
 *
 * @category    Centurion
 * @package     Centurion_Model
 * @subpackage  DbTable
 * @copyright   Copyright (c) 2008-2011 Octave & Octave (http://www.octaveoctave.com)
 * @license     http://centurion-project.org/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * @category    Centurion
 * @package     Centurion_Model
 * @subpackage  DbTable
 * @copyright   Copyright (c) 2008-2011 Octave & Octave (http://www.octaveoctave.com)
 * @license     http://centurion-project.org/license/new-bsd     New BSD License
 * @author      Laurent Chenay <lc@octaveoctave.com>
 */
class Core_Model_DbTable_ContentType extends Centurion_Db_Table_Abstract
{
    protected $_name = 'centurion_content_type';
    
    protected $_rowClass = 'Core_Model_DbTable_Row_ContentType';
    
    public function getContentTypeIdOf($row)
    {
        $name = null;
        
        if ($row instanceof Centurion_Db_Table_Abstract) {
            $name = get_class($row);
        } elseif ($row instanceof Centurion_Db_Table_Row_Abstract) {
            $name = get_class($row->getTable());
        } else {
            throw new Centurion_Db_Table_Exception('Unknown type');
        }
        
        list($row, ) = $this->getOrCreate(array('name' => $name));
        return $row->id;
    }
}