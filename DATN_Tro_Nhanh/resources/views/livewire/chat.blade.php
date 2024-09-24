<div id="kt_content_container" class="container-xxl">
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
            <!--begin::Contacts-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header pt-7" id="kt_chat_contacts_header">
                    <!--begin::Form-->
                    <form class="w-100 position-relative" autocomplete="off">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span
                            class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid px-15" value=""
                            placeholder="Tìm kiếm..." wire:model.lazy="searchTerm"
                            wire:keydown.debounce.300ms="$refresh" />
                        <!--end::Input-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5" id="kt_chat_contacts_body" wire:poll="pollContacts">
                    <!--begin::List-->
                    <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header"
                        data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="0px">


                        <!--end::Separator-->
                        <!--begin::User-->
                        @if ($contacts->isEmpty())
                            <!-- Thông báo khi không tìm thấy kết quả -->
                            <div class="text-center text-muted">
                                Không tìm thấy kết quả.
                            </div>
                        @else
                            @foreach ($contacts as $contact)
                                <div class="d-flex flex-stack py-4 {{ $selectedContactId == $contact['id'] ? 'active-contact' : '' }}"
                                    wire:click="selectContact({{ $contact['id'] }})">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center p-5" wire:key="item-{{ $contact['id'] }}">
                                        <!--begin::Avatar-->
                                        @if ($contact['image'])
                                            <div class="symbol symbol-45px symbol-circle">
                                                <img alt="Pic"
                                                    src="{{ asset('assets/images/' . $contact['image']) }}" />
                                            </div>
                                        @else
                                            <div class="symbol symbol-45px symbol-circle">
                                                <img alt="Pic" src="{{ asset('assets/images/agent-4-lg.jpg') }}" />
                                            </div>
                                        @endif

                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a wire:click="selectContact({{ $contact['id'] }})"
                                                class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">{{ $contact['name'] }}</a>
                                            <div class="fw-bold text-muted"><small>{{ $contact['email'] }}</small></div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Lat seen-->
                                    <div class="d-flex flex-column align-items-end ms-2">
                                        <span
                                            class="text-muted fs-7 mb-1">{{ $this->getRelativeTime($contact['last_message_time']) }}
                                        </span>
                                        @if ($contact['unread_count'] > 0)
                                            <span
                                                class="badge badge-sm badge-circle badge-light-warning">{{ $contact['unread_count'] }}</span>
                                        @endif
                                        <!-- Xóa trực tiếp -->
                                        {{-- <button
                                                        wire:click.stop="deleteChatPermanently({{ $contact['id'] }})"
                                                        class="btn btn-sm btn-icon btn-light-danger"
                                                        title="Xóa đoạn chat">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button> --}}
                                        <!-- Xác nhận mới xóa -->
                                        <button wire:click.stop="confirmDelete({{ $contact['id'] }})"
                                            class="btn btn-sm btn-link text-danger p-0" title="Xóa đoạn chat">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                    <!--end::Lat seen-->
                                </div>
                                <!--end::User-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed d-none"></div>
                            @endforeach
                        @endif
                        <!--end::User-->
                    </div>
                    <!--end::List-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Contacts-->
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->

        <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
            <!--begin::Messenger-->
            <div class="card" id="kt_chat_messenger">
                <!--begin::Card header-->
                <div class="card-header" id="kt_chat_messenger_header">
                    <!--begin::Title-->
                    <div class="card-title">
                        <!--begin::User-->
                        <div class="d-flex justify-content-center flex-column me-3">
                            <a href="#"
                                class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ $sender ? $sender->name : 'Chọn người nhận' }}</a>
                            <!--begin::Info-->
                            {{-- <div class="mb-0 lh-1">
                                <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                <span class="fs-7 fw-bold text-muted">Active</span>
                            </div> --}}
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <div class="me-n3">
                            @if ($sender)
                                <a href="{{ route('client.client-agent-detail', $sender->slug) }}"
                                    class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
                                    <i class="bi bi-person-lines-fill fs-2 me-2"></i>
                                </a>
                            @endif

                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body" id="chatBox" wire:poll="getmesseger" style="height: 400px; overflow-y: auto;">
                    <!--begin::Messages-->
                    <div id="chat-messages">

                        @if (isset($messages) && count($messages) > 0)
                            @foreach ($messages as $message)
                                @if ($message['sender_id'] == $currentUserId)
                                    <!--begin::Message(out)-->
                                    <div class="d-flex justify-content-end mb-10">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-end">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Details-->
                                                <div class="me-3">
                                                    <span
                                                        class="text-muted fs-7 mb-1">{{ $message['relative_time'] }}</span>
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">Bạn</a>
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Avatar-->
                                                @if (auth()->user()->image)
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic"
                                                            src="{{ asset('assets/images/' . auth()->user()->image) }}" />
                                                    </div>
                                                @else
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic"
                                                            src="{{ asset('assets/images/agent-4-lg.jpg') }}" />
                                                    </div>
                                                @endif

                                                <!--end::Avatar-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Text-->
                                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                                data-kt-element="message-text"> {{ $message['message'] }}
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Message(out)-->
                                @else
                                    <!--begin::Message(in)-->
                                    <div class="d-flex justify-content-start mb-10">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-start">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center mb-2">
                                                <!--begin::Avatar-->
                                                @if ($sender && $sender->image)
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic"
                                                            src="{{ asset('assets/images/' . $sender->image) }}" />
                                                    </div>
                                                @else
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic"
                                                            src="{{ asset('assets/images/agent-4-lg.jpg') }}" />
                                                    </div>
                                                @endif

                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-3">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">
                                                        {{ $sender ? $sender->name : 'Người khác' }}</a>
                                                    <span
                                                        class="text-muted fs-7 mb-1">{{ $message['relative_time'] }}</span>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Text-->
                                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                                data-kt-element="message-text"> {{ $message['message'] }}</div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                @endif
                            @endforeach
                            <!--end::Message(in)-->
                            <!--begin::Message(template for out)-->
                            {{-- <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-end">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Details-->
                                    <div class="me-3">
                                        <span class="text-muted fs-7 mb-1">Just now</span>
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                    data-kt-element="message-text"></div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(template for out)-->
                        <!--begin::Message(template for in)-->
                        <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a href="#"
                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                        <span class="text-muted fs-7 mb-1">Just now</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                    data-kt-element="message-text">Right before vacation season we have the next Big
                                    Deal for you.</div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div> --}}
                            <!--end::Message(template for in)-->
                        @else
                            <p class="text-center">Chưa có tin nhắn nào.</p>
                        @endif
                    </div>

                    <!--end::Messages-->
                </div>

                <!--end::Card body-->
                <!--begin::Card footer-->

                <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                    <form wire:submit.prevent="sendMessage" class="d-flex flex-column">
                        <!--begin::Input-->
                        <div class="input-group mb-3">
                            <input class="form-control" wire:model="newMessage" rows="1"
                                data-kt-element="input" placeholder="Nhập tin nhắn..." style="resize: none;"></input>
                            <!--end::Input-->
                            <!--begin:Toolbar-->
                            <div class="d-flex flex-stack">
                                <!--begin::Actions-->
                                {{-- <div class="d-flex align-items-center me-2">
                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                data-bs-toggle="tooltip" title="Coming soon">
                                <i class="bi bi-paperclip fs-3"></i>
                            </button>
                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                data-bs-toggle="tooltip" title="Coming soon">
                                <i class="bi bi-upload fs-3"></i>
                            </button>
                        </div> --}}
                                <!--end::Actions-->
                                <!--begin::Send-->
                                <button class="btn btn-primary" type="submit" data-kt-element="send">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                            <!--end::Send-->
                        </div>
                    </form>
                    <!--end::Toolbar-->
                </div>


                <!--end::Card footer-->
            </div>
            <!--end::Messenger-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout-->
    <!--begin::Modals-->
    <!--begin::Modal - View Users-->

    <!--end::Modal - Users Search-->
    <!--end::Modals-->
</div>
