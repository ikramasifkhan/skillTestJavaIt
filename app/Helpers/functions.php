<?Php
use Brian2694\Toastr\Facades\Toastr;

function bladeIcon($type){
    switch ($type){
        case 'add':
            echo '<i class="fa fa-plus"></i>';
            break;
        case 'edit':
            echo '<i class="fa fa-edit"></i>';
            break;
        case 'delete':
            echo '<i class="fa fa-trash"></i>';
            break;
        case 'active':
            echo '<i class="icon fa fa-thumbs-o-up"></i>';
            break;
        case 'inactive':
            echo '<i class="icon fa fa-thumbs-o-down"></i>';
            break;
    }

}


function successRedirect($message, $route){
    Toastr::success($message);
    return redirect()->route($route);
}


function showStatus($status)
{
    switch ($status){
        case 'active':
            echo '<span class="badge badge-pill badge-primary">Active</span>';
            break;
        case 'inactive':
            echo '<span class="badge badge-pill badge-danger">Iactive</span>';
            break;
    }
}


function activeInactiveChange($element){
    if ($element->status == 'active') {
        $element->status = 'inactive';
        $element->update();
        return successRedirect('Info inactive successfully', 'fees.index');
    }
    if ($element->status == 'inactive') {
        $element->status = 'active';
        $element->update();
        return successRedirect('Info active successfully', 'fees.index');
    }
}
