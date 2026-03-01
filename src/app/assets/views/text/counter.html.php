@layout('layouts.main', [
'title' => 'Word Counter'
])

@{
    $app->assets->addScript('js/tools/text/counter.js');
    $app->assets->addScript('js/ui/toast.js');
}

<Ui.Card data-controller="counter: Counter">
    <Layout.Row cols="2" cols-md="4">
        <Ui.TitleCard
            color="primary"
            data-text="counter.letters"
            title="Characters"
            />
        <Ui.TitleCard
            color="primary"
            data-text="counter.words"
            title="Words"
            />
        
        <Ui.TitleCard
            color="light"
            data-text="counter.sentences"
            title="Sentences"
            />
        <Ui.TitleCard
            color="light"
            data-text="counter.readingTime"
            title="Reading Time"
            />
    </Layout.Row>

    <Forms.TextArea
        id="text-input"
        data-bind="text"
        placeholder="Start typing or paste your text here..."/>

    <Layout.Flex justify="end">
        <Forms.PillButton data-onclick="counter.clear()">
            Clear Text
        </Forms.PillButton>
        <Forms.PillButton variant="primary" data-onclick="counter.copy()">
            Copy Text
        </Forms.PillButton>
    </Layout.Flex>
</Ui.Card>