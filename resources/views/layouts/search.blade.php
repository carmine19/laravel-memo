<form id="form-custom-search" class="form-inline" method="GET">
<fieldset class="w-full space-y-1 dark:text-coolGray-100">
	<label for="Search" class="hidden">Cerca</label>
	<div class="relative">
		<span class="absolute inset-y-0 left-0 flex items-center pl-2">
			<button type="submit" title="search" class="p-1 focus:outline-none focus:ring">
			</button>
		</span>
		<input value="{{$filter}}" type="search" name="filter" placeholder="Cerca..." class="w-32 py-2 pl-10 text-sm rounded-md sm:w-auto focus:outline-none dark:bg-coolGray-800 dark:text-black focus:dark:bg-coolGray-900 focus:dark:border-violet-400">
		@if ( !empty($filter) )
		<x-nav-link :href="route('memo.index')" class="dark:text-white">
                       X
        </x-nav-link>
		@endif
	</div>
</fieldset>
</form>