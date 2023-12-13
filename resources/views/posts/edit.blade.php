
<x-layouts.main>
    <x-slot:title>
        Postni o'zgartirish #{{ $post->id }}
    </x-slot:title>

        <!-- Page Header Start -->
   <x-page-start>
    Postni o'zgartirish /{{ $post->id }}
   </x-page-start>
    <!-- Page Header End -->

    <div class="row">
        <div class="container col-lg-7 mb-5 mb-lg-0">
            <div class="contact-form">
                <div id="success"></div> 
                <form action="{{ route('posts.update' , ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="col-sm-6 control-group mb-4">
                            <input type="text" class="form-control p-4"  value="{{ $post->title }}" name="title" placeholder="Sarlavha"  >
                            @error('title')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <div class="col-sm-6 control-group">
                            <input type="file" class="form-control p-4" name="photo" placeholder="Photo"  />
                            @error('photo')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                            {{-- <p class="help-block text-danger"></p> --}}
                        </div>

                    </div>
                    <div class="control-group mb-4 ">
                        <textarea class="form-control p-4" rows="3" name="short_content"  placeholder="Short_Content"  >{{ $post->short_content }}</textarea>
                        @error('short_content')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="6" name="content"  placeholder="Content"  >{{ $post->content }}</textarea>
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