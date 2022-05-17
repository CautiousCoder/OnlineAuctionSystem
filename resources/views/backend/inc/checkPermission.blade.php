$("#checkboxall").click(function(){
  if ($(this).is(':checked')) {
    // All checkbox checked
    $('input[type=checkbox]').prop('checked', true);
  }else {
    // All checkbox unchecked
    $('input[type=checkbox]').prop('checked', false);
  }
});
function checkPermissionByGroup(className, checkThis){ //checkThis = find permission_group
const classIdName = $('#'+checkThis.id); //find permission_group Id
const classCheckBox = $("."+className+" input"); //className = role-{{ $i }}-management-checkbox then select inner input
if (classIdName.is(':checked')) {
    // className checkbox checked
    classCheckBox.prop('checked', true);
  }else {
    classCheckBox.prop('checked', false);
  }
  checkAllPermissions();
}
//Individual group select
function checkSinglePermission(className, classIdName, countPermissions) {
const groupIdCheckBox = $('#'+classIdName); //find Id name
if ($('.'+className+' input:checked').length == countPermissions) {
  groupIdCheckBox.prop('checked', true);
}else {
  groupIdCheckBox.prop('checked', false);
}
checkAllPermissions();
}
 //All permission select
 function checkAllPermissions() {
  const allPermission = {{ count($all_permissions) }}; //find all permission
  const allGroup = {{ count($permissions_group) }}; //find all group
  if ($('input[type="checkbox"]:checked').length >= (allPermission + allGroup)) {
    $('#checkboxall').prop('checked', true);
  }else {
    $('#checkboxall').prop('checked', false);
  }
}