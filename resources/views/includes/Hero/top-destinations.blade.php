
            @php
            $tops = [
                ['img' => 'assets/images/listing/1.jpg', 'name' => 'Rome, Italy', 'title' => '3 Hotels'],
                ['img' => 'assets/images/listing/2.jpg', 'name' => 'Singapore', 'title' => '3 Hotels'],
                ['img' => 'assets/images/listing/3.jpg', 'name' => 'Paris, France', 'title' => '3 Hotels'],
                ['img' => 'assets/images/listing/4.jpg', 'name' => 'Goa, India', 'title' => '3 Hotels'],
                ['img' => 'assets/images/listing/5.jpg', 'name' => 'Whistler, Canada', 'title' => '3 Hotels'],
                ['img' => 'assets/images/listing/6.jpg', 'name' => 'Kuala Lumpur, Malaysia', 'title' => '3 Hotels'],
                ['img' => 'assets/images/listing/7.jpg', 'name' => 'Sydney, Australia', 'title' => '3 Hotels'],
            ];
            @endphp
            
            @foreach ($tops as $item)
                <div class="relative group overflow-hidden rounded-lg shadow-sm border border-gray-200 flex-shrink-0 w-80">
                    <img src="{{ asset($item['img']) }}" class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110" alt="">
                    <div class="p-4 bg-white">
                        <p class="trip-type text-sm text-indigo-500 font-medium">Beach</p>
                        <h4 class="section-text my-2 line-clamp-2 h-[56px] font-semibold text-gray-800">
                            {{ $item['name'] }} - Experience the Wonders of the underwater World.
                        </h4>
                        <div class="mb-3 text-sm text-gray-700">
                            <span class="trip-from font-medium">From</span>
                            <span> <span class="text-black">TZS 770,000.00<sup class="text-xs">*</sup></span> </span>
                            <span class="tour-price text-gray-500">($ 280.00)</span>
                        </div>
                        <a href="#">
                            <button class="w-full mt-1 py-2 px-4 bg-black text-white rounded-full text-sm hover:bg-gray-800 transition duration-300">Discover Trip</button>
                        </a>
                    </div>
                </div>
            @endforeach
        