<?
echo $this->Form->create("User");
echo $this->Form->input("username");
echo $this->Form->input("password");
?><br><?
echo $this->Form->submit();
echo $this->Form->end(null);
?>