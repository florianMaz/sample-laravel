<!DOCTYPE html>
 
<html lang="en">
<head>
<title>Laravel DataTable Example- CodeChief</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

         <div class="container">
            <h2>Employees' list</h2>
            <a href="{{route('employees.create')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add a employee</a>
            <table class="table table-bordered" id="laravel_datatable">
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
   <script>
   $(document).ready( function () {
    $('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('employeeslist') }}",
           columns: [
                     { data: 'id', name: 'id' },
                     { data: 'name', name: 'name' },
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
            $('#laravel_datatable').DataTable().ajax.reload();
         }
      })
     }
  </script>
   </body>
</html>