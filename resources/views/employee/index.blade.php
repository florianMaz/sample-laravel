@extends('layouts.app')

@section('content')
        @if (\Session::has('error'))
            <div class="alert alert-error">
                {!! \Session::get('error') !!}
            </div>
        @endif
         <div class="container">
            <h2>Employees' list</h2>
            <a href="{{route('employees.create')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add a employee</a>
            <table class="table table-bordered" id="employee_datatable">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>First name</th>
                     <th>Email</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
         </div>



      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script>
         $(document).ready( function () {
         $('#employee_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ url('employeeslist') }}",
               columns: [
                           { data: 'id', name: 'id' },
                           //{ data: 'companies.name', name: 'name' },
                           { data: 'first_name', name: 'first_name' },
                           { data: 'email', name: 'email' },
                           {data: 'action', name: 'action', orderable: false, searchable: false},
                     ]
            });
         });

         function deleteEmployee(employeeId) {
            var header = new Headers();
            header.append("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].content);
            fetch('/employees/' + employeeId, {
               method: 'DELETE',
               headers: header
            })
            .then(res => {
               if (res.status === 200) {
                  $('#employee_datatable').DataTable().ajax.reload();
               }
            })
         }
      </script>

@endsection
   