<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Mivento Assessment</title>

    <style>
      .row {
        margin-top: 2rem !important;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
        @if(isset($errors) && $errors->any())
          <div class="alert alert-danger">
          @foreach($errors->all() as $error)
          {{  $error }}
          @endforeach
          </div>
          @endif

          @if(session()->has('failures'))
            <table class="table table-danger">
              <tr>
                  <th>Satır</th>
                  <th>Özellik</th>
                  <th>Hata</th>
                  <th>Değer</th>
              </tr>

                  @foreach (session()->get('failures') as $validation)
                    <tr>
                        <td>{{ $validation->row() }}</td>
                        <td>{{ $validation->attribute() }}</td>
                        <td>
                            <ul>
                            @foreach ($validation->errors() as $error )
                                <li> {{  $error }}</li>
                            @endforeach
                            </ul>
                        </td>
                        <td>
                          {{  $validation->values()[$validation->attribute()] }}
                        </td>
                     </tr>                      
                  @endforeach 
            </table>
            @endif
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
          <form action="{{ route('campaign.store') }}" method="post" enctype="multipart/form-data" id="campaign_store">
          @csrf
            <div class="mb-3">
              <label for="campaign-name" class="form-label">Kampanya Adı</label>
              <input type="text" class="form-control" name="campaign_name" id="campaign_name" />
            </div>
            <div class="mb-3">
              <select class="form-select" name="campaign_date" id="campaign_date">
                <option selected disabled value="">Tarih Seçin</option>
                <option value="2020-06">Haziran 2020</option>
                <option value="2020-07">Temmuz 2020</option>
                <option value="2020-08">Ağustos 2020</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="campaign-file" class="form-label">Dosya Yükleyin</label>
              <input class="form-control" name="file" type="file" id="campaign_file"  required/>
            </div>
            <div class="d-grid">
              <button class="btn btn-primary btn-block" type="submit">Yükle</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>

<script>

$( document ).ready(function() {
  $("#campaign_store").validate({
      rules : {
        campaign_name : "required",
        campaign_date : "required",
        campaign_file : "required"
      },
      messages :{
        campaign_name : "Kampanya adı boş bırakılamaz",
        campaign_date : "Kampanya tarihi boş bırakılamaz",
        campaign_file : "Ek boş bırakılamaz"
      }
  });
});

</script>




    <!-- Example starter JavaScript for disabling form submissions if there are invalid fields -->
    {{-- <script>
      (function () {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }

              form.classList.add('was-validated');
            }, false);
          });
      })();
    </script> --}}
  </body>
</html>