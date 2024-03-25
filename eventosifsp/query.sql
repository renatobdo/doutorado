use eventosifsp;
select * from eventos;
desc eventos;
ALTER TABLE `eventos` MODIFY `cep` varchar(10);
select * from arboviroses where cep = '09750-001';

ALTER TABLE catalogo CHANGE COLUMN nome termo VARCHAR(255) NOT NULL;
select * from catalogo;
