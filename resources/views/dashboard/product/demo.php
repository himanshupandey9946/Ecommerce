<tr class="cc">
                                    <td> <select name="size_id[]" id="size_id"  class="form-control" style="color:white">
                                             @foreach($size as $sizes)
                                          <option value="{{$sizes->id}}">{{$sizes->name}}</option> 
                                             @endforeach
                                          </select></td>	
                                    <td> <select name="color_id[]"  id="color_id" class="form-control" style="color:white">
                                             @foreach ($color as $colors)
                                             <option value="{{$colors->id}}">{{$colors->name}}</option>
                                             @endforeach
                                          </select></td> 
                                    <td> <input type="text" class="form-control " style="color:white" name="qty[]" value="" placeholder=" Enter Quantity " ></td>	
                                    <td><input type="text" class="form-control " style="color:white" name="sku[]" value="{{old('sku'),$v->sku}}" placeholder="Enter SKU " ></td>
                                    <td><input type="text" class="form-control " style="color:white" name="attr_price[]" value="" placeholder=" Enter Price " ></td> 
                                    <td></td>   							
                                    <td class="remove text-center"></td>
                                 </tr>