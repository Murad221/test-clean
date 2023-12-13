
<x-layouts.main>
    <x-slot:title>
        Bosh Sahifa
    </x-slot:title>

    <!-- Page Header Start -->
    <x-page-start>
        CREATE
    </x-page-start>
        <!-- Page Header End -->

        <div class="row">
            <div class="container col-lg-7 mb-5 mb-lg-0">
                <div class="contact-form">
                    <div id="success"></div> 
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-6 control-group mb-4">
                                <input type="text" class="form-control p-4"  value="{{ old('title') }}" name="title" placeholder="Sarlavha"  >
                                @error('title')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                                
                            </div>  
                          
                            <div class="col-sm-6 control-group mb-4">
                                <label> Category </label>
                                {{-- <input type="text" class="form-control p-4"  value="{{ old('title') }}" name="category"   > --}}
                                <select name="category_id" >
                                    @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6 control-group mb-4">
                                {{-- <input type="text" class="form-control p-4"  value="{{ old('title') }}" name="category"   > --}}
                                <label> Taglar </label>
                                <select name="tags[] " multiple>
                                    {{-- <option value=""> tag tanlang </option> --}}
                                    @foreach ( $tags as $tag )
                                    <option value="{{ $tag->id }}">{{ $tag->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6 control-group">
                                <input type="file" class="form-control p-4" name="photo" placeholder="Photo"  />
                                @error('photo')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                               
                            </div>

                        </div>
                        <div class="control-group mb-4 ">
                            <textarea class="form-control p-4" rows="3" name="short_content"  placeholder="Short_Content"  >{{ old('short_content') }}</textarea>
                            @error('short_content')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group mb-4">
                            <textarea class="form-control p-4" rows="6" name="content"  placeholder="Content"  >{{ old('content') }}</textarea>
                            @error('content')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                           
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    

</x-layouts.main>