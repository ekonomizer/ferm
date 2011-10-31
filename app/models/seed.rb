class Seed < ActiveRecord::Base
	validates :objectName,      :presence => true
	validates :x,    			:presence => true
	validates :y,				:presence => true
	validates :plantedTime,		:presence => true
end
