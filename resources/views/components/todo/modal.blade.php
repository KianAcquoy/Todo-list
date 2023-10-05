<div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div id="modalContainer" class="relative bg-white border-4 border-white mx-auto rounded-md z-50 overflow-y-auto">
        <div class="modal-content text-left">
            <div class="flex justify-between items-center">
                <button id="closeModal" class="modal-close p-2 rounded-full hover:bg-gray-100 absolute right-5 top-2">
                    <div class="w-[1.5vw] h-[1.5vw]">
                        <x-icons.cross />
                    </div>
                </button>
            </div>
            <iframe id="modalBody" src="" frameborder="0" class="w-fit h-fit"></iframe>
        </div>
    </div>
</div>
</script>