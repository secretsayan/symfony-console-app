<?php

namespace ContainerVhusvKV;

return [
    'App\\AppKernel' => true,
    'App\\Console\\Command\\CreateUserCommand' => true,
    'App\\Console\\Command\\Helper\\TimeCommandHelper' => true,
    'App\\Console\\Command\\TimeCommand' => true,
    'App\\Options\\CreateUserOptions' => true,
    'Psr\\Container\\ContainerInterface' => true,
    'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
];
