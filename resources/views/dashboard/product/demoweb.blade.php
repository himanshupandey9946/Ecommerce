<div class="card-body">
                                 <div class="row">
                                    <div class="col-md-2">
                                       <div class="form-group">
                                          <label >Size</label>
                                          <select name="size_id[]" id="size_id"  class="form-control" style="color:white">
                                             @foreach($size as $sizes)
                                          <option value="{{$sizes->id}}">{{$sizes->name}}</option> 
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <div class="form-group">
                                          <label >Color</label>
                                          <select name="color_id[]"  id="color_id" class="form-control" style="color:white">
                                             @foreach ($color as $colors)
                                             <option value="{{$colors->id}}">{{$colors->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <div class="form-group">
                                          <label >Qty </label><br> 
                                          <input type="text" class="form-control " style="color:white" name="qty[]" value="" placeholder=" Enter Quantity " >
                                       </div>
                                    </div>
                                    <div class="col-md-6"><div class="form-group"><label >SKU</label> <input type="text" class="form-control " style="color:white" name="sku[]" value="{{old('sku')}}" placeholder="Enter SKU " >  </div>  </div>
                                    <div class="col-md-2">
                                       <div class="form-group">
                                          <label >Price </label><br> 
                                          <input type="text" class="form-control " style="color:white" name="attr_price[]" value="" placeholder=" Enter Price " >
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group">
                                       <label >Action</label><br> 
                                       <button type="button" class="btn btn-success " onclick="add_more()">Add</button>
                                    </div>
                                    </div>

                                 </div>
                              </div>


                              <?php foreach($productAttrArr as $k => $v){ ?>

                                <?php } ?>

