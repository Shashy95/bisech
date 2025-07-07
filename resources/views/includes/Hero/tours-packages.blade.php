 @php
            $packages = [
                [
                    'id' => 1,
                    'img' => 'assets/images/listing/1.jpg', 
                    'location' => 'Dubai',
                    'title' => 'Cuba Sailing Adventure',
                    'price-d' => '$ 58 / Day',
                    'discount' => '10% Off',
                    'category' => 'Mountain Climbing'
                ],
                [
                    'id' => 2,
                    'img' => 'assets/images/listing/2.jpg', 
                    'location' => 'Italy',
                    'title' => 'Tour in New York',
                    'price-d' => '$ 58 / Day',
                    'discount' => 'false',
                    'category' => 'City Tours'
                ],
                [
                    'id' => 3,
                    'img' => 'assets/images/listing/3.jpg', 
                    'location' => 'Maldivas',
                    'title' => 'Discover Greece',
                    'price-d' => '$ 58 / Day',
                    'discount' => 'false',
                    'category' => 'Beach Adventure'
                ],
                [
                    'id' => 4,
                    'img' => 'assets/images/listing/4.jpg', 
                    'location' => 'USA',
                    'title' => 'Museum of Modern Art',
                    'price-d' => '$ 58 / Day',
                    'discount' => 'false',
                    'category' => 'Cultural Tours'
                ],
                [
                    'id' => 5,
                    'img' => 'assets/images/listing/5.jpg', 
                    'location' => 'Bali',
                    'title' => 'Peek Mountain View',
                    'price-d' => '$ 58 / Day',
                    'discount' => 'false',
                    'category' => 'Mountain Climbing'
                ],
                [
                    'id' => 6,
                    'img' => 'assets/images/listing/6.jpg', 
                    'location' => 'Bangkok',
                    'title' => 'Hot Baloon Journey',
                    'price-d' => '$ 58 / Day',
                    'discount' => '25% Off',
                    'category' => 'Adventure Sports'
                ]
            ];
            @endphp

            @foreach ($packages as $item)
                <div class="group  flex-shrink-0 w-80">
                    <div class="relative overflow-hidden rounded-t-md shadow-sm dark:shadow-gray-700 mx-3 mt-3">
                        <img src="{{ asset($item['img']) }}" class="w-full h-56 object-cover scale-125 group-hover:scale-100 duration-500" alt="">

                        @if ($item['discount'] !== 'false')
                            <div class="absolute top-0 start-0 p-4">
                                <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">{{ $item['discount'] }}</span>
                            </div>
                        @endif

                       
                    </div>

                    <div class="p-4">
                       
                        
                        <h4 class="section-text line-clamp-1 mb-[10px] md:mb-[6px] text-lg font-medium">{{ $item['category'] }}</h4>
                        <p class="description-gray-6 mb-3 h-12 md:mb-4 text-slate-400">Discover breathtaking landscapes with our {{ strtolower($item['category']) }} adventures.</p>
                        
                       
                        
                       
                    </div>
                </div>
            @endforeach