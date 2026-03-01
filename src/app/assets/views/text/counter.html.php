@layout('layouts.main', [
'title' => 'Word Counter'
])

@{
    $app->assets->addScript('/js/tools/text/counter.js');
}

<Ui.Card data-scope="counter: {text: ''}">
    <Layout.Row cols="2" cols-md="4">
        <Ui.TitleCard
            color="primary"
            data-text="counter.text.length"
            title="Characters"
            />
        <Ui.TitleCard
            color="primary"
            data-text="counter.text.split(' ').filter(s => s.trim().length > 0).length"
            title="Words"
            />
        
        <Ui.TitleCard
            color="light"
            data-text="counter.text.split(/[.!?]+/).filter(s => s.trim().length > 0).length"
            title="Sentences"
            />
        <Ui.TitleCard
            color="light"
            data-text="Math.ceil(counter.text.trim().split(/\s+/).filter(word => word.length > 0).length / 200) + 'm'"
            title="Reading Time"
            />
    </Layout.Row>

    <Forms.TextArea
        id="text-input"
        data-bind="text"
        placeholder="Start typing or paste your text here..."/>

    <div class="mt-6 flex justify-end gap-3">
        <button id="clear-btn" class="px-6 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-full transition-colors">
            Clear Text
        </button>
        <button id="copy-btn" class="px-6 py-2.5 text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700 rounded-full shadow-lg shadow-indigo-200 transition-all">
            Copy Text
        </button>
    </div>
</Ui.Card>

<!-- Feedback Message -->
<div id="toast" class="fixed bottom-8 left-1/2 -translate-x-1/2 bg-gray-900 text-white px-6 py-3 rounded-full text-sm font-medium opacity-0 pointer-events-none transition-all">
    Copied to clipboard
</div>