    <!-- Modal -->
    <div class="modal fade" id="productModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('update') }}/{{ $product->id }}" method="post" enctype="multipart/form-data" class="form-horizontal form-material">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Product Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" name="name" id="name" value=" {{$product->name}} ">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Product Description</label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea rows="5" class="form-control p-0 border-0" id="description" name="description"> {{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Price</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" id="price" value=" {{$product->price}}" name="price">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Stock</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" id="stock" value=" {{$product->stock}}" name="stock">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Weight (in kg)</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" class="form-control p-0 border-0" id="weight" value=" {{$product->weight}}" name="weight">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Category</label>

                            <div class="col-sm-12 border-bottom">

                                <select class="form-select shadow-none p-0 border-0 form-control-line" name="category">

                                    @foreach ($category as $cat)
                                    <option value="{{$cat->id}}" {{old('category_id', $product->category_id) == $cat->id ? 'selected': null}}> {{ $cat->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="ajaxSubmit">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>