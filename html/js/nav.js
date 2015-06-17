        $(function() {
            $('#main-menu').smartmenus({
                subMenusSubOffsetX: 1,
                subMenusSubOffsetY: -8
            });
			
			$('#menu-button').click(function() {
    var $this = $(this),
        $menu = $('#main-menu');
    if (!$this.hasClass('collapsed')) {
      $menu.addClass('collapsed');
      $this.addClass('collapsed');
    } else {
      $menu.removeClass('collapsed');
      $this.removeClass('collapsed');
    }
    return false;
  }).click();
        });
