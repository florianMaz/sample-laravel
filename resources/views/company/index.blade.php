@extends('layouts.app')
@section('content')
      <div class="container border border-light rouned">
         <h3 class="text-primary text-center mb-4" >Companies</h3>
         <div class="col-md-12 border border-light rouned p-4">
            <a href="{{route('companies.create')}}" class="btn btn-primary mb-4" role="button" aria-pressed="true">Add a company</a>
            <table class="table table-striped table-bordered" style="width:100%" id="company_datatable">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
         </div>
      </div>
            
   <script>
   $(document).ready( function () {
    $('#company_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('companieslist') }}",
           columns: [
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