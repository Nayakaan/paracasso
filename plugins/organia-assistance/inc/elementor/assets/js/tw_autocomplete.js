jQuery(window).on('elementor:init', function () {
    "use strict";
    let TwAutocomplete = elementor.modules.controls.BaseData.extend({
        onReady: function () {
            var self = this;
            var search = true;
            this.ui.select.select2({
                allowClear: true,
                placeholder: 'Search',
                minimumInputLength: 2,
                ajax: {
                    url: ajaxurl,
                    dataType: 'json',
                    method: 'POST',
                    data: function (params) {
                        return {
                            s: params.term,
                            action: self.model.get('action'),
                            taxonomy: self.model.get('taxonomy'),
                            post_type: self.model.get('post_type'),
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data,
                        };
                    },
                    cache: false,
                }
            });

            if (search) {
                var ids = this.getControlValue();
                if (!ids) {
                    return;
                }
                if (!_.isArray(ids)) {
                    ids = [ids];
                }
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: self.model.get('action'),
                        taxonomy: self.model.get('taxonomy'),
                        post_type: self.model.get('post_type'),
                        id: ids,
                    },
                    success: function (results) {
                        search = false;
                        jQuery.each(results, function () {
                            if (ids.length > 0) {
                                let data = new Option(this.text, this.id, true, true);
                                self.ui.select.append(data).trigger("change");
                            }
                        });
                    },
                });
            }
        },
        onBeforeDestroy: function () {
            if (this.ui.select.data('select2')) {
                this.ui.select.select2('destroy');
            }
            this.el.remove();
        },
    });

    elementor.addControlView('tw_autocomplete', TwAutocomplete);
});
