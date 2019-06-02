
 	<div id="side-section">
      <ul id="side">
        @if (Auth::user()->hasRole(0))
        <li><a href="{{route('users.index')}}">مستخدمي النظام<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('class.index')}}">الصفوف<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{ route('course.index') }}">الدورات<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('subject.index')}}">المواد<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('unit.index')}}">الوحدات الدرسية<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('lesson.index')}}">الدروس<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('carousel.index')}}">إدارة القلاب<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('showlesson.index')}}">الدروس الأستعراضية<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('studentthank.index')}}">تشكرات الطلاب<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('deneme.index')}}">إدارة الدينيمي<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('freereason.index')}}">إعفاءات الطلاب<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('advice.index')}}">إدارة النصائح<i class="fa fa-angle-double-left pull-left"></i></a></li>
        @endif
        @if (Auth::user()->hasRole(1))
        <li><a href="{{route('users.index')}}">مستخدمي النظام<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('class.index')}}">الصفوف<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{ route('course.index') }}">الدورات<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('subject.index')}}">المواد<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('unit.index')}}">الوحدات الدرسية<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('lesson.index')}}">الدروس<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('carousel.index')}}">إدارة القلاب<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('showlesson.index')}}">الدروس الأستعراضية<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('studentthank.index')}}">تشكرات الطلاب<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('deneme.index')}}">إدارة الدينيمي<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('freereason.index')}}">إعفاءات الطلاب<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('advice.index')}}">إدارة النصائح<i class="fa fa-angle-double-left pull-left"></i></a></li>
        @endif
        @if (Auth::user()->hasRole(2))
        <li><a href="{{route('subject.index')}}">المواد<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('unit.index')}}">الوحدات الدرسية<i class="fa fa-angle-double-left pull-left"></i></a></li>
        <li><a href="{{route('lesson.index')}}">الدروس<i class="fa fa-angle-double-left pull-left"></i></a></li>
        @endif
        @if (Auth::user()->hasRole(3))
        <li><a href="{{route('lesson.index')}}">الدروس<i class="fa fa-angle-double-left pull-left"></i></a></li>
        @endif
      </ul>
    </div>

