<div class="row mt-4 mx-4" id="message">
    <div class="card mb-4">
        <div class="row card-header pb-0">
            <h3 class="mb-0">Comentários</h3>
        </div>
        <div class="card-body pb-0">
            <div class="row px-1">
                <ul class="list-unstyled rounded overflow-auto py-3" style="background-color: #eee; max-height: 500px">
                @forelse ($messages as $message)
                    <li class="d-flex {{ $message->user_id == Auth::user()->id ? 'justify-content-end' : 'justify-content-start' }}">
                      <div class="card">
                        @if ($message->user_id != Auth::user()->id)
                        <div class="card-header d-flex p-2 pb-0">
                          <p class="fw-bold mb-0">{{ $message->caller->firstname . ' ' . $message->caller->lastname }}</p>
                        </div>
                        @endif
                        <div class="card-body py-2">
                          <p class="mb-0">
                            {{ $message->message }}
                          </p>
                        </div>
                      </div>
                    </li>
                    <div class="d-flex {{ $message->user_id == Auth::user()->id ? 'justify-content-end' : 'justify-content-start' }} mb-2 mx-3">
                       {{ $message->created_at->format('d/m/Y H:i') }}
                    </div>
                @empty
                <div class="col-12">
                    <p>Nenhum comentário adicionado.</p>
                </div>
                @endforelse
                </ul>

                {{ $messages->links() }}
            </div>
        </div>
        <div class="row card-footer">
            <form method="post" action="{{ route('messages.store', ['call' => $call->id]) }}">
                @csrf
                <div class="col-12 mb-3">
                    <div class="form-outline">
                        <label class="form-label" for="message">Comentário</label>
                        <textarea class="form-control" name="message" id="message" rows="4"></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end m-0 p-0">
                    <button type="submit" class="btn btn-primary">Comentar</button>
                </div>
            </form>
        </div>
    </div>
</div>
