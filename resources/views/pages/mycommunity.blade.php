@extends('layout.templateuser')

@section('title', 'Createcommunity')

@section('content')
    
<div class="container">
  <form>

    <div class="row">
      <p>Profile</p>
      <div class="fkategori">
        <p>Kategori</p>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown button
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
      </div>
    </div>

    <div class="fprofile">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input class="form-input col-12 w-75" type="text" id="exampleInputUsername" placeholder="Username">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input class="form-input col-12 w-75" type="text" id="exampleInputUsername" placeholder="Username">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<div class="text-center">
        <a href="" class="btncreate badge text-wrap text-center ms-3 me-3"><button class="btn p-2" >Continue</button></a>
</div>

<br><br><br><br><br>



@stop