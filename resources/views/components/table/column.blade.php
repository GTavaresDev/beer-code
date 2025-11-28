<th class="py-3 px-3 first:ps-0 last:pe-0 text-start text-sm font-medium text-zinx-800 dark:text-white border-b border-zinc-800/10 dark:border-white20">
   <div class="flex in-[.group\/center-align]: justify-center in-[.group\/end-align]: justify-end">
       
   @if(!sortable)
       {{ $slot }}
   @else 
    <button type="button"
        class="group/sortable flex items-center gap-1 -my-1 -ms-2 -me-2 px-2 py-1 in-[.group\/end-align]:flex-row-reverse">
    <div>{{slot}}</div>
    @if ($sorted)
    </button>

   @endif
   </div>
</th>