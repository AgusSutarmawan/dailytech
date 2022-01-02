@if (Route::has('login'))
                @auth
                    @if (Auth::user()->role == 'admin')
                    @foreach ($collection as $item)
                    <div class="border-bottom">                       
                        <p><h3>{{ $item['reqID'] }}</h3></p>
                        <p><h3>{{ $item['title'] }}</h3></p>
                        <p>{{ $item['description'] }}</p>
                        <p><h3>{{ $item['name'] }}</h3></p>
                        <p>{{ $item['userID'] }}</p>
                        <p>Tanggal {{ $item['createdAt'] }}</p>
                    </div>
                    @endforeach
                    @else
                    @foreach ($filtered as $item)
                    <div class="border-bottom">
                    <table>
                    <p><h3>{{ $item['reqID'] }}</h3></p>
                        <p><h3>{{ $item['title'] }}</h3></p>
                        <p>{{ $item['description'] }}</p>
                        <p><h3>{{ $item['name'] }}</h3></p>
                        <p>{{ $item['userID'] }}</p>
                        <p>Tanggal {{ $item['createdAt'] }}</p>
                    </table>
                        
                    </div>
                    @endforeach
                    @endif
                @endauth
            @endif


            <!-- <table class="table-fixed w-full text-center">
                <thead class="bg-gradient-to-r from-green-400 to-blue-500">
                    <tr>
                        <th class="px-4 py-2 text-white">No</th>
                        <th class="px-4 py-2 text-white" width="10%">Image</th>
                        <th class="px-4 py-2 text-white">Nama</th>
                        <th class="px-4 py-2 text-white">Kategori</th>
                        <th class="px-4 py-2 text-white">Qty</th>
                        <th class="px-4 py-2 text-white">Harga</th>
                        <th class="px-4 py-2 text-white">Action </th>
                    </tr>
                </thead>
                </table -->
