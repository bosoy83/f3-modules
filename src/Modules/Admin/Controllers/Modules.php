<?php 
namespace Modules\Admin\Controllers;

class Modules extends \Admin\Controllers\BaseAuth 
{
    public function index()
    {
        \Base::instance()->set('pagetitle', 'Modules');
        \Base::instance()->set('subtitle', '');
        
        $model = new \Modules\Admin\Models\Modules;
        $state = $model->populateState()->getState();
        \Base::instance()->set('state', $state );
        
        $list = $model->paginate();
        \Base::instance()->set('list', $list );
        
        $pagination = new \Dsc\Pagination($list['total'], $list['limit']);       
        \Base::instance()->set('pagination', $pagination );
        
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Modules/Admin/Views::modules/list.php');
    }
}