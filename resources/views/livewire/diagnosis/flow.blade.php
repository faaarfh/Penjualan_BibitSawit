<div>

    @if ($state === 'mulai-diagnosis')
        <livewire:diagnosis.mulai-diagnosis />
    @elseif($state === 'hasil-diagnosis')
        <livewire:diagnosis.hasil-diagnosis  :penyakit="$penyakit"/>
    @endif

</div>
