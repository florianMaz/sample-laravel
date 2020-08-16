@extends('layouts.app')
@section('content')
         <div class="container">
            <h2>Companies' list</h2>
            <a href="{{route('companies.create')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add a company</a>
            <table class="table table-bordered" id="company_datatable">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
         </div>
   <script>
   $(document).ready( function () {
    $('#company_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('companieslist') }}",
           columns: [
                     { data: 'id', name: 'id' },
                     { data: 'name', name: 'name' },
                     { data: 'email', name: 'email' },
                     {data: 'action', name: 'action', orderable: false, searchable: false},
                 ]
        });
     });

     function deleteCompany(companyId) {
      var header = new Headers();
      header.append("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].content);
      fetch('/companies/' + companyId, {
         method: 'DELETE',
         headers: header
      })
      .then(res => {
         if (res.status === 200) {
            $('#company_datatable').DataTable().ajax.reload();
         }
      })
     }
  </script>
   @endsection