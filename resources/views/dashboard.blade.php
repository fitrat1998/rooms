@extends('admin.layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashbord</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
   <script>
    $(function () {
      function ini_events(ele) {
        ele.each(function () {
          var eventObject = {
            title: $.trim($(this).text())
          }
          $(this).data('eventObject', eventObject)
          $(this).draggable({
            zIndex: 1070,
            revert: true,
            revertDuration: 0
          })
        })
      }
      ini_events($('#external-events div.external-event'))

      var date = new Date()
      var d = date.getDate(),
          m = date.getMonth(),
          y = date.getFullYear()

      var Calendar = FullCalendar.Calendar
      var Draggable = FullCalendar.Draggable

      var containerEl = document.getElementById('external-events')
      var checkbox = document.getElementById('drop-remove')
      var calendarEl = document.getElementById('calendar')

      new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText,
            backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color')
          };
        }
      });

      var calendar = new Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        events: [
          @foreach($tasks as $task)
          @foreach($task->permissions as $permission)
          {
            title: '{{ $permission->title }}',
            start: '{{ $task->start_date }}',
            end: '{{ $task->end_date }}',
            backgroundColor: '{{ $task->color }}',
            borderColor: '{{ $task->color }}',
          },
          @endforeach
          @endforeach
        ],
        editable: true,
        droppable: true,
        drop: function(info) {
          if (checkbox.checked) {
            info.draggedEl.parentNode.removeChild(info.draggedEl);
          }
        }
      });

      calendar.render();
    });
  </script>
@endsection
