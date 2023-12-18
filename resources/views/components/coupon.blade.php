<div>
    <style>
        .coupon-code::before,
        .coupon-code::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: #fff;
            border-radius: 100%;
            z-index: 1;
        }

        .coupon-code::before {
            top: -6%;
            left: 0%;
        }

        .coupon-code::after {
            bottom: -6%;
            left: 0%;
        }
    </style>

    <div class="bg-gray-700 mx-auto rounded-xl flex justify-evenly">
        <div class="flex flex-col text-[#d4af37] m-6 items-center justify-center">
            <p class="text-4xl">Discount coupon</p>
            {{-- {{ dd(Coupons::check($coupon->code)) }} --}}
            <p class="text-6xl font-bold">
                <span>
                    @if ($coupon->data['type'] === 'amount')
                        ${{ $coupon->data['value'] }}
                    @else
                        {{ $coupon->data['value'] }}%
                    @endif
                </span>
                OFF
            </p>
        </div>
        <div class="coupon-code flex-grow px-16 py-4 mr-2 w-auto text-[#d4af37] relative overflow-y-hidden text-center">
            <p id="coupon_{{ $coupon->id }}" class="text-6xl font-bold leading-loose">{{ $coupon->code }}</p>
            <span class="border-l-4 border-dashed border-[#d4af37] absolute h-full top-0"
                style="left: 1.3%; z-index:0"></span>
        </div>
        <div
            class="bg-[#d4af37] rounded-r-xl w-1/12 font-bold flex flex-col justify-center space-y-1 items-center hover:opacity-95">
            <button onclick="copyText({{ $coupon->id }}); return false;">
                <i class="text-gray-600 hover:text-gray-900 fas fa-copy"></i>
            </button>
            <button onclick="copyLink({{ $coupon->id }}); return false;">
                <i class="text-gray-600 hover:text-gray-900 fas fa-share"></i>
            </button>
            <button>
                <a href="{{ route('coupons.edit', $coupon->id) }}">
                    <i class="text-gray-600 hover:text-gray-900 fas fa-pen"></i>
                </a>
            </button>
            <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <i class="text-gray-600 hover:text-gray-900 fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    <script>
        function copyText(idElement) {
            // Select the element with the ID "text-to-copy"
            var textToCopy = document.querySelector('#coupon_' + idElement);

            // Select all the text within the element
            var range = document.createRange();
            range.selectNode(textToCopy);
            window.getSelection().addRange(range);

            // Copy the selected text to the clipboard
            document.execCommand('copy');

            // Remove text selection
            window.getSelection().removeAllRanges();
        }

        function copyLink(idElement) {
            // Assuming that route('coupons.show', idElement) returns a URL
            var urlToCopy = route('coupons.show', idElement);

            // Create a temporary text element
            var tempElement = document.createElement("textarea");
            tempElement.value = urlToCopy;
            document.body.appendChild(tempElement);

            // Select the content of the temporary element
            tempElement.select();
            tempElement.setSelectionRange(0, 99999); // For mobile devices

            // Copy the selected text to the clipboard
            document.execCommand('copy');

            // Remove the temporary element
            document.body.removeChild(tempElement);
        }
    </script>
</div>
