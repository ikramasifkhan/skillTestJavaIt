<aside class="app-sidebar">
    <ul class="app-menu">

      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Academic management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ route('class.index') }}"><i class="icon fa fa-circle-o"></i> Class list</a></li>
          <li><a class="treeview-item" href="{{ route('group.index') }}"><i class="icon fa fa-circle-o"></i> Group list</a></li>
          <li><a class="treeview-item" href="{{ route('section.index') }}"><i class="icon fa fa-circle-o"></i> Section list</a></li>
        </ul>
      </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Student management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ route('student.index') }}"><i class="icon fa fa-circle-o"></i> Student list</a></li>
        </ul>
      </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Fees Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ route('payment.index') }}"><i class="icon fa fa-circle-o"></i> Payment list</a></li>
          <li><a class="treeview-item" href="{{ route('fees.index') }}"><i class="icon fa fa-circle-o"></i> Fees list</a></li>
          <li><a class="treeview-item" href="{{ route('fees-setup.index') }}"><i class="icon fa fa-circle-o"></i> Fees setup list</a></li>
        </ul>
      </li>
    </ul>
  </aside>
