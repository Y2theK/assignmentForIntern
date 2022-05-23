@extends('layouts.master')
@section('content')
<div class="container">
  <div class="card mt-5">
    <h4 class="card-header text-dark">Student List</h4>
    @if (session('status'))
    <div class="alert alert-success mt-2">{{ session('status') }}</div>
    @endif
    <div class="card-body">
      <table id="studentsTable" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>NRC</th>
            <th>Courses</th>


          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
          <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->dob }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->nrc }}</td>
            <td>
              @foreach ($student->courses as $course)
              <span class="badge bg-warning text-dark mb-2">{{ $course->name }}</span>
              @endforeach
            </td>

          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
{{-- jQuery Datatable --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
{{-- bootstrap5 ui with jQuery --}}
{{-- <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script> --}}
<script>
  $(document).ready( function () {
    $('#studentsTable').DataTable({
        "paging": true,
        "pageLength": 8,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        'columnDefs': [ {
        'targets': [5], /* column index */
        'orderable': false, /* oraderable true or false */
        
     }]
      });
} );
</script>