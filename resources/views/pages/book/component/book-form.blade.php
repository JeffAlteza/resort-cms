<section class="flex items-center bg-slate-100 lg:h-screen font-poppins  ">
    <div class="justify-center flex-1 max-w-6xl px-4 py-4 mx-auto lg:py-11 md:px-6">
        <div class="mb-10 text-left">
            <h2 class="pb-2 mb-2 text-xl font-bold text-gray-800 md:text-3xl ">
                Get Ready to Make Memories
            </h2>
            <p class="text-sm text-gray-700">View Available Dates and Fill up the form </p>
        </div>
        <div class="flex flex-wrap ">
            <div class="w-full px-4 lg:w-1/2 mb-11 lg:mb-0">
                @include('pages.book.component.calendar')
            </div>
            <div class="w-full px-4 lg:w-1/2">
                <form action="{{ route('book-mail') }}" method="post" class="p-6 bg-white shadow rounded-lg">
                    @csrf
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="name" name="name" placeholder="Form control lg" required/>
                        <label for="name"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Full Name
                        </label>
                    </div>
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="email"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="email" name="email" placeholder="Form control lg" required/>
                        <label for="email"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Email
                        </label>
                    </div>
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="cellphone" name="cellphone" placeholder="Form control lg" required/>
                        <label for="cellphone"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Mobile Number
                        </label>
                    </div>
                    <div class="flex gap-3">
                        <div class="flex-1 relative mb-3" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init
                            data-te-format="yyyy-mm-dd">
                            <input type="text" name="checkin"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                placeholder="Checkin date" required/>
                            <label for="floatingInput"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                                Checkin date</label>
                        </div>
                        
                        <div class="flex-1 relative mb-3" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init
                            data-te-format="yyyy-mm-dd">
                            <input type="text" name="checkout"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                placeholder="Checkout date" required/>
                            <label for="floatingInput"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                                Checkout date</label>
                        </div>
                    </div>                    
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <textarea
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="message" name="message" rows="4" placeholder="Your message"></textarea>
                        <label for="message"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Message
                        </label>
                    </div>
                    <button type="submit"
                        class="inline-flex justify-center items-center py-2 px-5 text-lg  text-center text-sky-600 rounded-lg bg-white border border-sky-600 hover:bg-sky-600 hover:text-white focus:ring-4 focus:ring-gray-400">
                        Book
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
