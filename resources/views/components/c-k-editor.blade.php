<script src="{{ asset('assets/js/ckeditor5-dll.js') }}"></script>
<script src="{{ asset('assets/js/editor-classic.js') }}"></script>
<script src="{{ asset('assets/js/essentials.js') }}"></script>
<script src="{{ asset('assets/js/adapter-ckfinder.js') }}"></script>
<script src="{{ asset('assets/js/autoformat.js') }}"></script>
<script src="{{ asset('assets/js/basic-styles.js') }}"></script>
<script src="{{ asset('assets/js/block-quote.js') }}"></script>
<script src="{{ asset('assets/js/ckfinder.js') }}"></script>
<script src="{{ asset('assets/js/easy-image.js') }}"></script>
<script src="{{ asset('assets/js/heading.js') }}"></script>
<script src="{{ asset('assets/js/image.js') }}"></script>
<script src="{{ asset('assets/js/indent.js') }}"></script>
<script src="{{ asset('assets/js/link.js') }}"></script>
<script src="{{ asset('assets/js/list.js') }}"></script>
<script src="{{ asset('assets/js/media-embed.js') }}"></script>
<script src="{{ asset('assets/js/paste-from-office.js') }}"></script>
<script src="{{ asset('assets/js/table.js') }}"></script>
<script src="{{ asset('assets/js/cloud-services.js') }}"></script>
<script src="{{ asset('assets/js/html-embed.js') }}"></script>
<script src="{{ asset('assets/js/source-editing.js') }}"></script>
<script>
    function loadEditor(editorSelector) {
        let editor;
        CKEditor5.editorClassic.ClassicEditor.create(document.querySelector(''+editorSelector+''), {
                plugins: [
                    CKEditor5.essentials.Essentials,
                    CKEditor5.autoformat.Autoformat,
                    CKEditor5.basicStyles.Bold,
                    CKEditor5.basicStyles.Italic,
                    CKEditor5.basicStyles.Underline,
                    CKEditor5.basicStyles.Code,
                    CKEditor5.blockQuote.BlockQuote,
                    CKEditor5.cloudServices.CloudServices,
                    CKEditor5.heading.Heading,
                    CKEditor5.image.Image,
                    CKEditor5.image.ImageCaption,
                    CKEditor5.image.ImageStyle,
                    CKEditor5.image.ImageToolbar,
                    CKEditor5.image.ImageUpload,
                    CKEditor5.indent.Indent,
                    CKEditor5.link.Link,
                    CKEditor5.list.List,
                    CKEditor5.mediaEmbed.MediaEmbed,
                    CKEditor5.pasteFromOffice.PasteFromOffice,
                    CKEditor5.table.Table,
                    CKEditor5.table.TableCaption,
                    CKEditor5.table.TableProperties,
                    CKEditor5.table.TableCellProperties,
                    CKEditor5.table.TableToolbar,
                    CKEditor5.typing.TextTransformation,
                    CKEditor5.upload.Base64UploadAdapter,
                    CKEditor5.htmlEmbed.HtmlEmbed,
                    CKEditor5.sourceEditing.SourceEditing
                ],
                toolbar: {
                    items: [
                        'undo',
                        'redo',
                        '|',
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'underline',
                        'code',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'outdent',
                        'indent',
                        '|',
                        'uploadImage',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'sourceEditing'
                    ]
                },
                image: {
                    toolbar: [
                        'imageStyle:inline',
                        'imageStyle:block',
                        'imageStyle:side',
                        '|',
                        'toggleImageCaption',
                        'imageTextAlternative'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        '|',
                        'tableProperties',
                        'tableCellProperties',
                        '|',
                        'toggleTableCaption'
                    ]
                },
            })
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(handleSampleError => {
                console.log(handleSampleError);
            });
    }
</script>
