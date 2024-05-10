<?php
class BlogLike
{
private ?int $id;
private ?int $userId;
private ?int $blogId;
private ?string $action;

public function __construct(?int $id, ?int $userId, ?int $blogId, ?string $action)
{
$this->id = $id;
$this->userId = $userId;
$this->blogId = $blogId;
$this->action = $action;
}

public function getId(): ?int
{
return $this->id;
}

public function getUserId(): ?int
{
return $this->userId;
}

public function setUserId(?int $userId): void
{
$this->userId = $userId;
}

public function getBlogId(): ?int
{
return $this->blogId;
}

public function setBlogId(?int $blogId): void
{
$this->blogId = $blogId;
}

public function getAction(): ?string
{
return $this->action;
}

public function setAction(?string $action): void
{
$this->action = $action;
}
}
?>