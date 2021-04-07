<div class="flex justify-end">
  <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center text-center px-4 py-2 bg-jasper-purple border border-transparent rounded-md font-semibold font-sans-roboto text-s text-white uppercase  hover:bg-jasper-dark_purple active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
      {{ $slot }}
  </button>
</div>
