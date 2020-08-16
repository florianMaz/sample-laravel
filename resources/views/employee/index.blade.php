@extends('layouts.app')

@section('content')
         <div class="container border border-light rouned">
            <h3 class="text-primary text-center mb-4" >Employees</h3>
            <div class="col-md-12 border border-light rouned p-4">
            <a href="{{route('employees.create')}}" class="btn btn-primary mb-4" role="button" aria-pressed="true">Add a employee</a>
            <table class="table table-striped table-bordered" style="width:100%" id="employee_datatable">
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
      </div>
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
   