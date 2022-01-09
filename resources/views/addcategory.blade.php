<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <title>YazraBox Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  </head>
  <body>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <a href="{{URL('/')}}" class="btn btn-success" >Back</a>
    </div>
  </div>
    <div class="row">
      <div class="col-md-12 mt-3" >
        <div class="card-body">
          <form method="POST" @if(empty($category['id'])) action="{{route('addeditCategory')}}" @else action="{{route('addeditCategory', $category['id'])}}" @endif class="row g-3"   enctype="multipart/form-data">
              @csrf
              <div class="col-12">
                <label for="inputEmail4" class="form-label">category Name</label>
                <input type="name" name="name" class="form-control" id="inputEmail4"  placeholder="Enter category Name" @if(!empty($category['id'])) value="{{$category['name']}}" @endif>
              </div>
              <div class="col-6">
                  <div class="mb-3">
                      <label for="exampleFormControlSelect1">Main Shop</label>
                      <select name="mainshop_id" class="form-control" id="exampleFormControlSelect1">
                          <option  disabled selected >Please select Main Shop</option>
                          @foreach (App\Models\MainShop::all() as $mainshop)
                          <option value="{{$mainshop->id}}" @if(!empty($category['id']) && $category['mainshop_id']==$mainshop->id ) selected @endif>{{$mainshop->name}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>

              <div class="col-md-6">
                  <label for="exampleFormControlSelect1" >Category Status</label>
                  <select name="status" class="form-control" id="exampleFormControlSelect1">
                      <option  disabled selected >Please select Status</option>
                      <option value="1" @if(!empty($category['id']) && $category['status']==1 ) selected @endif>Active</option>
                      <option value="0" @if(!empty($category['id']) && $category['status']==0 ) selected @endif>Inactive</option>
                  </select>
              </div>

              <div class="col-md-6">
                  <label for="formFile" class="form-label">Image</label>
                  <input class="form-control-file" type="file" name="image" id="formFile" accept="image/*" >
                  <img id="output" @if(!empty($category['image']))  src="{{asset('images/category/'.$category['image'])}}" @endif  class="py-3" height="40"/>
              </div>
              <div class="col-md-6">
                  <label for="formFile" class="form-label">Icon</label>
                  <input class="form-control-file" type="file" name="icon" id="formFile" accept="image/*" >
                  <img id="outputtwo"  @if(!empty($category['icon']))  src="{{asset('images/category/'.$category['icon'])}}" @endif class="py-3" height="40"/>
              </div>
              
              <div class="col-12">
                  <button type="submit" value="Submit" class="btn btn-success">Save</button>
              </div>
            </form>
       </div>
     </div>
    </div>  
 </div>     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js" type="text/javascript"></script>

  </body>
</html>