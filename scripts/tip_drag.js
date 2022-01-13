/*
tip_drag.js  v. 1.01

The latest version is available at
http://www.walterzorn.com
or http://www.devira.com
or http://www.walterzorn.de

Initial author: Walter Zorn
Last modified: 3.6.2008

Extension for the tooltip library wz_tooltip.js.
Makes sticky tooltips draggable.
*/

// Make sure that the core file wz_tooltip.js is included first
if(typeof config == "undefined")
	alert("Error:\nThe core tooltip script file 'wz_tooltip.js' must be included first, before the plugin files!");

// Here we define new global configuration variable(s) (as members of the
// predefined "config." class).
// From each of these config variables, wz_tooltip.js will automatically derive
// a command which can be passed to Tip() or TagToTip() in order to customize
// tooltips individually. These command names are just the config variable
// name(s) translated to uppercase,
// e.g. from config. Draggable a command DRAGGABLE will automatically be
// created.

//===================  GLOBAL TOOLTIP CONFIGURATION  =========================//
config. Draggable = false		// true or false - set to true if you want this to be the default behaviour
config. DragCursor = "move";	// Any valid CSS cursor name (value), in quotes
//=======  END OF TOOLTIP CONFIG, DO NOT CHANGE ANYTHING BELOW  ==============//


// Create a new tt_Extension object (make sure that the name of that object,
// here tt_drag, is unique amongst the extensions available for wz_tooltips.js):
var tt_drag = new tt_Extension();

tt_drag.PTip = tt_Tip;

// Implement extension eventhandlers on which our extension should react

tt_drag.OnShow = function()
{
	if(tt_aV[STICKY] && tt_aV[DRAGGABLE])
	{
		tt_AddEvtFnc(tt_aElt[0], "mousedown", Drag_Start);
		tt_AddEvtFnc(tt_aElt[0], "mouseup", Drag_End);
		tt_aElt[0].style.cursor = tt_aV[DRAGCURSOR];
		return true;
	}
	tt_aV[DRAGGABLE] = false;
	return false;
}
tt_drag.OnHide = function()
{
	if(tt_aV[DRAGGABLE])
	{
		tt_Tip = tt_drag.PTip;
		tt_RemEvtFnc(document, "mousemove", Drag_Move);
		tt_RemEvtFnc(tt_aElt[0], "mousedown", Drag_Start);
		tt_RemEvtFnc(tt_aElt[0], "mouseup", Drag_End);
		tt_aElt[0].style.cursor = "default";
	}
	return false;
}
function Drag_Start(e)
{
	e = window.event || e;
	if(e)
	{
		var nod = e.target || e.srcElement || null;
		if(nod)
		{
			// No Drag&Drop inside inputs or on scrollbars
			var sTag = ("" + (nod.tagName || nod)).toLowerCase();
			if(sTag.indexOf('inpu') < 0 && sTag.indexOf('textar') < 0 && sTag.indexOf('sele') < 0 && sTag.indexOf('optio') < 0 && sTag.indexOf('scrol') < 0)
			{
				Drag_CancelBubble(e);
				// While the tip is being dragged, disable tt_Tip(), so the
				// tip won't hide when another HTML element that would trigger
				// a tip is accidentally being hovered in a browser with bugous
				// event syncronization (IE, Opera)
				tt_Tip = function(){};
				tt_AddEvtFnc(document, "mousemove", Drag_Move);
				tt_drag.xOld = tt_GetEvtX(e);
				tt_drag.yOld = tt_GetEvtY(e);
				// Prevent Opera from selecting text while the tip is being
				// dragged
				if(tt_op)
					tt_body.focus();
				return false;
			}
		}
	}
	return true;
}
function Drag_Move(e)
{
	var x, y;
	
	e = window.event || e;
	Drag_CancelBubble(e);
	x = tt_GetEvtX(e);
	y = tt_GetEvtY(e);
	tt_SetTipPos(tt_x + x - tt_drag.xOld, tt_y + y - tt_drag.yOld);
	tt_drag.xOld = x;
	tt_drag.yOld = y;
	return false;
}
function Drag_End()
{
	tt_RemEvtFnc(document, "mousemove", Drag_Move);
	// Re-enable tt_Tip()
	tt_Tip = tt_drag.PTip;
}
function Drag_GetEvtX(e)
{
	return ((typeof(e.pageX) != tt_u) ? e.pageX : (e.clientX + tt_GetScrollX()));
}
function Drag_GetEvtY(e)
{
	return ((typeof(e.pageY) != tt_u) ? e.pageY : (e.clientY + tt_GetScrollY()));
}
function Drag_CancelBubble(e)
{
	e.cancelBubble = true;
	if(e.stopPropagation)
		e.stopPropagation();
}
